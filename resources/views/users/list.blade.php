<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Filter Dropdown -->
            <!-- <div class="mb-4">
                <label for="statusFilter" class="text-white">Filter by Status:</label>
                <select id="statusFilter" class="ml-2 p-2 rounded border dark:bg-gray-700 dark:text-white">
                    <option value="all">All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div> -->

            <!-- Filter Buttons -->
            <div class="mb-4 flex gap-2">
                <button class="statusFilter bg-gray-700 text-white px-4 py-2 rounded" data-status="all">All</button>
                <button class="statusFilter bg-gray-600 text-white px-4 py-2 rounded" data-status="active">Active</button>
                <button class="statusFilter bg-gray-900 text-white px-4 py-2 rounded" data-status="inactive">Inactive</button>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 text-white">
                <table class="min-w-full divide-y divide-gray-200" id="userTable">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Created At</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- <script>
        $(document).ready(function () {
            let table = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('users.list') }}",
                    data: function (d) {
                        d.isActive = $('#statusFilter').val();
                        d._token = '{{ csrf_token() }}';
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    {
                        data: 'status',
                        name: 'status',
                        render: function (data) {
                            return data == 1
                                ? '<span class="text-green-600 font-semibold">Active</span>'
                                : '<span class="text-red-600 font-semibold">Inactive</span>';
                        }
                    },
                    { data: 'created_at', name: 'created_at' },
                    {
                        data: null,
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            const editUrl = `/users/${row.id}/edit`;
                            const editBtn = `<a href="${editUrl}" class="btn btn-sm btn-primary">Edit</a>`;
                            const deleteBtn = `<button data-id="${row.id}" class="btn btn-sm btn-danger deleteUser">Delete</button>`;
                            return editBtn + ' ' + deleteBtn;
                        }
                    }
                ]
            });

            $('#statusFilter').on('change', function () {
                table.draw();
            });

            $(document).on('click', '.deleteUser', function () {
                let id = $(this).data("id");
                if (confirm("Are you sure?")) {
                    $.ajax({
                        url: `/users/${id}`,
                        type: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function () {
                            table.ajax.reload();
                            alert("User deleted successfully.");
                        }
                    });
                }
            });
        });
    </script> -->

    <script>
        let selectedStatus = 'all';

        $(document).ready(function () {
            let table = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('users.list') }}",
                    data: function (request) {
                        request.isActive = selectedStatus;
                        request._token = '{{ csrf_token() }}';
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    {
                        data: 'status',
                        name: 'status',
                        render: function (data) {
                            return data == 1
                                ? '<span class=" font-semibold">Active</span>'
                                : '<span class=" text-gray-600 font-semibold">Inactive</span>';
                        }
                    },
                    { data: 'created_at', name: 'created_at' },
                    {
                        data: null,
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            const editUrl = `/users/${row.id}/edit`;
                            const editBtn = `<a href="${editUrl}" class="btn btn-sm btn-primary">Edit</a>`;
                            const deleteBtn = `<button data-id="${row.id}" class="btn btn-sm btn-danger deleteUser">Delete</button>`;
                            return editBtn + ' ' + deleteBtn;
                        }
                    }
                ]
            });

            $('.statusFilter').on('click', function () {
                selectedStatus = $(this).data('status');
                table.draw();
            });

            $(document).on('click', '.deleteUser', function () {
                let id = $(this).data("id");

                $.ajax({
                    url: `/users/${id}`,
                    type: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function () {
                        alert("User deleted successfully.");
                        table.ajax.reload(); 
                    },
                    error: function () {
                        alert("Failed to delete user.");
                    }
                });
            });
        });
    </script>

    @endpush
</x-app-layout>
