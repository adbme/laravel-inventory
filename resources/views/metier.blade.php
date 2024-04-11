

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<x-app-layout>
    <x-slot  name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            types de métiers
        </h2>


    </x-slot>

    

<div class="popup" id="popup">
    <div class="popup-content">
      <i id="closeBtn" class="fa fa-times" aria-hidden="true"></i>

      @include('edit')
    </div>
  </div>

  <div class="overlay" id="overlay"></div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th>Id</th>
                <th>métier</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach($metier as $metier)
    <tr>
        <td>{{ $metier->id }}</td>
        <td>{{ $metier->nom }}</td>
    </tr>
@endforeach

        </tbody>
        
    </table>


    <style>
        table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
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

#closeBtn{
margin-bottom: 20px
}

#popupBtn{
cursor:pointer
}

.searchBar{
    width:500px;

}
    </style>
    

</x-app-layout> 
