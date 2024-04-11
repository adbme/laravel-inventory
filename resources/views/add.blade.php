<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajout de matériel
        </h2>
    </x-slot>

    <form action="{{ route('dashboard.store') }}" method="post">
        @csrf
        <label for="type">Type :</label>
        <select id="type" name="type">
            <option value="Laptop">Laptop</option>
            <option value="Clavier">Clavier</option>
            <option value="Souris">Souris</option>
            <option value="Écran">Écran</option>
        </select><br>

        <label for="numero">Numéro :</label>
        <input type="text" id="numero" name="numero"><br>

        <label for="assigne">Assigné à :</label>
        <input type="text" id="assigne" name="assigne"><br>

        <label for="metier">Métier :</label>
        <select id="metier" name="metier">
            <option value="Développeur">Développeur</option>
            <option value="Employé de commerce">Employé de commerce</option>
            <option value="Collaborateur">Collaborateur</option>
            <option value="-">-</option>
        </select><br>

        <label for="marque">Marque :</label>
        <input type="text" id="marque" name="marque"><br>

        <input type="submit" value="Submit">
    </form>
</x-app-layout>
