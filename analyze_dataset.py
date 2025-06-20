"""Script to analyze dataset distribution for djik/TinyStories-12k.

Downloads the dataset using the Hugging Face `datasets` library and prints the
number of examples for each split. For the training split, it also computes a
histogram of text lengths (in characters) using 20 bins and prints the counts.
"""

from collections import Counter

from datasets import load_dataset

import numpy as np


DATASET_NAME = "djik/TinyStories-12k"


def main():
    ds = load_dataset(DATASET_NAME)

    for split_name, split in ds.items():
        print(f"Split {split_name}: {len(split)} examples")

    train_texts = ds["train"]["text"]
    lengths = [len(t) for t in train_texts]

    counts, bin_edges = np.histogram(lengths, bins=20)
    for i in range(len(counts)):
        print(
            f"{int(bin_edges[i])}-{int(bin_edges[i+1])}: {counts[i]}"
        )


if __name__ == "__main__":
    main()
