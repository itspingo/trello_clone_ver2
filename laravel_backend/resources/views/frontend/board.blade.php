<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Livewire App</title>

    <link rel="stylesheet" href="{{ asset('project/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('project/assets/css/fontawesome.min.css') }}">
    
    <script src="{{ asset('project/assets/js/Sortable.min.js') }}"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script> -->
    

   
</head>
<body>

<div>
    <div class="top-menu">
        <div class="left-section">
            <img src="logo.png')}}" alt="Logo" class="logo">
            <div class="dropdown">Menu 1 <i class="fas fa-caret-down"></i></div>
            <div class="dropdown">Menu 2 <i class="fas fa-caret-down"></i></div>
            <div class="dropdown">Menu 3 <i class="fas fa-caret-down"></i></div>
            <div class="dropdown">Menu 4 <i class="fas fa-caret-down"></i></div>
            <button class="create-button">Create 123</button>
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
            <button class="collapse-button" id="collapseButton"><i class="fas fa-arrow-left"></i></button>
            <ul>
                <li><a href="#"><i class="fas fa-tachometer-alt"></i><span class="menu-text"> Dashboard</span></a></li>
                <li><a href="#"><i class="fas fa-columns"></i><span class="menu-text"> Boards</span></a></li>
                <li><a href="#"><i class="fas fa-cog"></i><span class="menu-text"> Settings</span></a></li>
            </ul>
        </div>
        <div class="right-container">
            <div class="second-level-menu">
                <div class="left-options">
                    <span class="board-name">Board Name</span>
                    <i class="fas fa-star"></i>
                    <a href="#"><i class="fas fa-columns"></i> <span class="menu-text">Board</span></a>
                    <a href="#"><i class="fas fa-table"></i> <span class="menu-text">Table</span></a>
                    <a href="#"><i class="fas fa-calendar"></i> <span class="menu-text">Calendar</span></a>
                    <a href="#"><i class="fas fa-chart-bar"></i> <span class="menu-text">Dashboard</span></a>
                    <a href="#"><i class="fas fa-stream"></i> <span class="menu-text">Timeline</span></a>
                    <a href="#"><i class="fas fa-map"></i> <span class="menu-text">Map</span></a>
                </div>
                <div class="right-options">
                    <a href="#"><i class="fas fa-robot"></i> <span class="menu-text">Automation</span></a>
                    <a href="#"><i class="fas fa-filter"></i> <span class="menu-text">Filter</span></a>
                    <i class="fas fa-user"></i>
                    <button class="share-button"><i class="fas fa-share"></i></button>
                    <button class="more-options-button" id="moreOptionsButton"><i
                            class="fas fa-ellipsis-h"></i></button>
                </div>
            </div>


            <div class="main-content">
                <div class="board" id="board">
                    <div class="list" id="list-1">
                        <h2>To Do</h2>
                        <div class="card-container">
                            <div class="card" id="card-1">Task 1</div>
                            <div class="card" id="card-2">Task 2</div>
                            <div class="card" id="card-3">Task 3</div>
                        </div>
                        <button class="add-card-button">Add Card</button>
                    </div>
                    <div class="list" id="list-2">
                        <h2>In Progress</h2>
                        <div class="card-container">
                            <div class="card" id="card-4">Task 4</div>
                            <div class="card" id="card-5">Task 5</div>
                        </div>
                        <button class="add-card-button">Add Card</button>
                    </div>
                    <div class="list" id="list-3">
                        <h2>Done</h2>
                        <div class="card-container">
                            <div class="card" id="card-6">Task 6</div>
                            <div class="card" id="card-7">Task 7</div>
                        </div>
                        <button class="add-card-button">Add Card</button>
                    </div>
                </div>
                <button class="add-list-button" id="addListButton">Add New List</button>
            </div>
            


        </div>

    </div>
</div>

<script src="{{ asset('project/assets/js/scripts.js') }}"></script>
</body>
</html>
