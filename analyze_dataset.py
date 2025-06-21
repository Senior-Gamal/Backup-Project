"""Utility to inspect TinyStories style datasets.

The script first attempts to load a small local sample dataset from
``data/tiny_stories.jsonl``. If that file is not present it falls back to
downloading ``djik/TinyStories-12k`` using the Hugging Face ``datasets``
library. Network failures are handled gracefully so the script can still run in
restricted environments.
"""

import os
import json
import sys

try:
    from datasets import load_dataset
except ImportError:  # pragma: no cover - optional dependency
    load_dataset = None

try:
    import numpy as np
except ImportError:  # pragma: no cover - optional dependency
    np = None


DATASET_NAME = "djik/TinyStories-12k"
LOCAL_PATH = os.path.join("data", "tiny_stories.jsonl")


def load_local_dataset():
    if not os.path.exists(LOCAL_PATH):
        return None

    with open(LOCAL_PATH, "r", encoding="utf-8") as f:
        texts = [json.loads(line)["text"] for line in f]
    return {"train": {"text": texts}}


def main():
    ds = load_local_dataset()
    if ds is None:
        if load_dataset is None:
            print(
                "Dataset library not installed and no local dataset found.",
                file=sys.stderr,
            )
            return
        try:
            ds = load_dataset(DATASET_NAME)
        except Exception as exc:
            print("Failed to download dataset:", exc)
            print(
                "Place a local JSONL dataset at 'data/tiny_stories.jsonl' or install the 'datasets' package."
            )
            return

    for split_name, split in ds.items():
        if isinstance(split, dict) and "text" in split:
            count = len(split["text"])
        else:
            count = len(split)
        print(f"Split {split_name}: {count} examples")

    split = ds["train"]
    train_texts = split["text"] if isinstance(split, dict) and "text" in split else split
    lengths = [len(t) for t in train_texts]

    if np is not None:
        counts, bin_edges = np.histogram(lengths, bins=20)
        ranges = [f"{int(bin_edges[i])}-{int(bin_edges[i+1])}" for i in range(len(counts))]
    else:
        max_len = max(lengths)
        step = max_len // 20 + 1
        ranges = []
        counts = []
        for start in range(0, max_len + 1, step):
            end = start + step
            ranges.append(f"{start}-{end}")
            counts.append(sum(start <= l < end for l in lengths))

    for r, c in zip(ranges, counts):
        print(f"{r}: {c}")


if __name__ == "__main__":
    main()
