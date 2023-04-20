<x-dashboard.app>

    <x-dashboard.page-header name="Users" />

    <x-form.form class="card shadow mb-4" url="{{ route('dashboard.users.update', $user->id) }}" method="PATCH">

        <x-dashboard.card-header>
            Edit {{ $user->name }}
        </x-dashboard.card-header>


        <x-dashboard.card-body>
            <x-form.field>
                <x-form.input name="name" type="text" value="{{ $user->name }}" />
                <x-form.input name="email" type="email" value="{{ $user->email }}" />
                <x-form.input name="password" type="password" required="false" />
            </x-form.field>

            <x-form.button class="btn btn-primary">Save</x-form.button>

        </x-dashboard.card-body>

    </x-form.form>

</x-dashboard.app>
