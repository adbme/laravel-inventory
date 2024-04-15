<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord
        </h2>

        <form action="{{ route('material.search') }}" method="GET">
            <input class="searchBar" placeholder="Rechercher du matériel" type="search" id="q" name="q">
            <input type="submit">
        </form>

        <h3>❌ = champ vide</h3>
        <h3>- = métier non attribuable à un matériel</h3>
    </x-slot>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Numéro</th>
                <th>Assigné à</th>
                <th>Métier</th>
                <th>Marque</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($materials as $material)
            <tr>
                <td>{{ $material->id }}</td>
                <td>{{ $material->type ? $material->type->name : '❌' }}</td>
                <td>{{ $material->numero }}</td>
                <td>{{ $material->assigne_a }}</td>
                <td>{{ $material->metier ? $material->metier->nom : '❌' }}</td>
                <td>{{ $material->marque }}</td>
                <td class="iconActionDiv">
                    <form action="/dashboard/{{$material->id}}" method="post" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    <button onclick="openPopup()" class="update-btn">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <!-- pop up edit -->
            <div class="popup" id="popup">
                <div class="popup-content">
                    <i id="closeBtn" class="fa fa-times" aria-hidden="true"></i>

                    <!-- @include('edit') -->
                    <form action="{{ route('dashboard.update', [$material->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="type">Type :</label>
                        <select id="type" name="type">
                            @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select><br>

                        <label for="numero">Numéro :</label>
                        <input type="text" value="{{ $material->numero }}" id="numero" name="numero"><br>

                        <label for="assigne">Assigné à :</label>
                        <input type="text" value="{{ $material->assigne_a }}" id="assigne" name="assigne"><br>

                        <label for="metier">Métier :</label>
                        <select id="metier" name="metier">
                            @foreach($metiers as $metier)
                            <option value="{{$metier->id }}">{{ $metier->nom }}</option>
                            @endforeach
                        </select><br>

                        <label for="marque">Marque :</label>
                        <input type="text" value="{{ $material->marque }}" id="marque" name="marque"><br>

                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>

            <div class="overlay" id="overlay"></div>

            @endforeach
        </tbody>

    </table>

    <script>
        const popup = document.getElementById('popup');
        const closeBtn = document.getElementById('closeBtn');
        const overlay = document.getElementById('overlay');

        function openPopup() {
            popup.style.display = 'block';
            overlay.style.display = 'block';
        }


        closeBtn.addEventListener('click', () => {
            popup.style.display = 'none';
            overlay.style.display = 'none';
        });

    </script>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .iconActionDiv {
            display: flex;
            justify-content: space-evenly
        }

        body {
            font-family: Arial, sans-serif;
        }

        .popup {
            z-index: 100;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .popup-content {
            text-align: center;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 99;
        }

        #closeBtn {
            margin-bottom: 20px
        }

        #popupBtn {
            cursor: pointer
        }

        .searchBar {
            width: 500px;
        }

    </style>


</x-app-layout>
