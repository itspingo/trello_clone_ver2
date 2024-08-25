<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Livewire App</title>

    <link rel="stylesheet" href="{{ asset('project/assets/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <script src="{{ asset('project/assets/js/Sortable.min.js') }}"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}"></script>

    @livewireStyles
</head>
<body>

<div>
<div class="top-menu">
        <div class="left-section">
            <img src="logo.png" alt="Logo" class="logo">
            <div class="dropdown">Menu 1 <i class="fas fa-caret-down"></i></div>
            <div class="dropdown">Menu 2 <i class="fas fa-caret-down"></i></div>
            <div class="dropdown">Menu 3 <i class="fas fa-caret-down"></i></div>
            <div class="dropdown">Menu 4 <i class="fas fa-caret-down"></i></div>
            <button class="create-button">Create</button>
        </div>
        <div class="right-section">
            <div class="search-container">
                <input type="text" placeholder="Search...">
                <button class="search-button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <i class="fas fa-bell icon"></i>
            <i class="fas fa-question-circle icon"></i>
            <i class="fas fa-user icon"></i>
        </div>
    </div>
    <div class="main-container">
    <div class="left-menu" id="leftMenu">
            <button class="collapse-button" id="collapseButton">
            <i class="fa-solid fa-angle-left"></i>
            </button>
            <ul>
                <li><a href="#"><i class="fas fa-tachometer-alt"></i><span class="menu-text"> Dashboard</span></a></li>
                <li><a href="#"><i class="fas fa-columns"></i><span class="menu-text"> Boards</span></a></li>
                <li><a href="#"><i class="fas fa-cog"></i><span class="menu-text"> Settings</span></a></li>
            </ul>
        </div>

        @yield('content')

    </div>
</div>
   
    @livewireScripts
</body>
<script src="{{ asset('project/assets/js/scripts.js') }}"></script>
</html>
