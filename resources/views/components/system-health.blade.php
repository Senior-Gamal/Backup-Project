<ul class="list-disc pl-5 bg-white dark:bg-gray-700 shadow rounded p-4">
    <li>PHP Version: {{ PHP_VERSION }}</li>
    <li>Disk Free: {{ round(disk_free_space('/') / 1073741824, 2) }} GB</li>
    <li>Timezone: {{ date_default_timezone_get() }}</li>
</ul>
