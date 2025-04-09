<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Listing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!DOCTYPE html>
                    <html>
                    <head>
                    <title>User Listing</title>
                    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

                    <style>
                        .dataTables_length select {
                            background-color: #4B5563 !important;
                            color: #ffffff !important;
                            border: 1px solid #6B7280 !important;
                            border-radius: 6px !important;
                            padding: 4px 8px !important;
                        }
                    </style>
                </head>
                    <body>
                        <table id="userTable" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                        </table>

                        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

                        <script>
                            $(document).ready(function () {
                                $('#userTable').DataTable({
                                    processing: true,
                                    serverSide: false,
                                    ajax: "{{ route('users.data') }}",
                                    columns: [
                                        { data: 'id' },
                                        { data: 'name' },
                                        { data: 'email' },
                                        { data: 'created_at' },
                                    ]
                                });
                            });
                        </script>

                    </body>
                    </html>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
