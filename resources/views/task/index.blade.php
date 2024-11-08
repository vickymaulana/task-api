<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Task List</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Title</th>
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="py-3 px-6 border-b-2 border-gray-300 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Completed</th>
                    </tr>
                </thead>
                <tbody id="task-table-body">
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/tasks')
                .then(response => response.json())
                .then(tasks => {
                    const tableBody = document.getElementById('task-table-body');
                    tasks.forEach(task => {
                        const row = document.createElement('tr');
                        row.classList.add('hover:bg-gray-100');

                        const titleCell = document.createElement('td');
                        titleCell.classList.add('py-4', 'px-6', 'border-b', 'border-gray-300');
                        titleCell.textContent = task.title;
                        row.appendChild(titleCell);

                        const descriptionCell = document.createElement('td');
                        descriptionCell.classList.add('py-4', 'px-6', 'border-b', 'border-gray-300');
                        descriptionCell.textContent = task.description;
                        row.appendChild(descriptionCell);

                        const completedCell = document.createElement('td');
                        completedCell.classList.add('py-4', 'px-6', 'border-b', 'border-gray-300');
                        const statusSpan = document.createElement('span');
                        statusSpan.classList.add('font-semibold');
                        if (task.is_completed) {
                            statusSpan.classList.add('text-green-500');
                            statusSpan.textContent = 'Completed';
                        } else {
                            statusSpan.classList.add('text-red-500');
                            statusSpan.textContent = 'Pending';
                        }
                        completedCell.appendChild(statusSpan);
                        row.appendChild(completedCell);

                        tableBody.appendChild(row);
                    });
                });
        });
    </script>
</body>
</html>