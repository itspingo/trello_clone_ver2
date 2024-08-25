

document.getElementById('collapseButton').addEventListener('click', function() {
    const leftMenu = document.getElementById('leftMenu');
    leftMenu.classList.toggle('collapsed');

    const collapseIcon = this.querySelector('i');
    if (leftMenu.classList.contains('collapsed')) {
        collapseIcon.classList.remove('fa-solid fa-angle-left');
        collapseIcon.classList.add('fa-solid fa-angle-right');
    } else {
        collapseIcon.classList.remove('fa-solid fa-angle-right');
        collapseIcon.classList.add('fa-solid fa-angle-left');
    }
});



document.addEventListener('DOMContentLoaded', function () {
    // Make the lists sortable (drag-and-drop)
    new Sortable(document.getElementById('board'), {
        animation: 150,
        handle: 'h2',
        draggable: '.list',
        onEnd: function (/**Event*/evt) {
            console.log('List moved');
        },
    });

    // Function to add sortable functionality to a card container
    function makeCardsSortable(cardContainer) {
        new Sortable(cardContainer, {
            animation: 150,
            group: 'shared',
            draggable: '.card',
            onEnd: function (/**Event*/evt) {
                console.log('Card moved');
            },
        });
    }

    // Make the cards sortable within their respective card containers
    document.querySelectorAll('.card-container').forEach(function (cardContainer) {
        makeCardsSortable(cardContainer);
    });

    // Add event listener to "Add Card" buttons
    // document.querySelectorAll('.add-card-button').forEach(function (button) {
    //     button.addEventListener('click', function () {
    //         var newCard = document.createElement('div');
    //         newCard.classList.add('card');
    //         newCard.innerHTML = ' <i class="fa-solid fa-grip-vertical grip-icon"></i> \
    //                             <span class="card_title" onclick="openCardTitleEditDialog({{$card->id}})" >{{$card->title}}</span> \
    //                         <i class="fas fa-ellipsis-v edit-icon" onclick="openCardEditOptionsDialog({{ $card->id }})"></i>';
    //         var cardContainer = button.previousElementSibling;
    //         cardContainer.appendChild(newCard);
    //         makeCardsSortable(cardContainer); // Re-apply sortable to include new card
    //     });
    // });

    // Add functionality to add new lists
    // document.getElementById('addListButton').addEventListener('click', function () {
        // var newList = document.createElement('div');
        // newList.classList.add('list');
        
        // var newListTitle = document.createElement('h2');
        // newListTitle.textContent = 'New List';
        
        // var newCardContainer = document.createElement('div');
        // newCardContainer.classList.add('card-container');
        
        // var addCardButton = document.createElement('button');
        // addCardButton.classList.add('add-card-button');
        // addCardButton.textContent = 'Add Card';
        
        // newList.appendChild(newListTitle);
        // newList.appendChild(newCardContainer);
        // newList.appendChild(addCardButton);
        
        // document.getElementById('board').appendChild(newList);

        // // Make the new card container sortable
        // makeCardsSortable(newCardContainer);

        // // Add event listener to new "Add Card" button
        // addCardButton.addEventListener('click', function () {
        //     var newCard = document.createElement('div');
        //     newCard.classList.add('card');
        //     newCard.textContent = 'New Task';
        //     newCardContainer.appendChild(newCard);
        //     makeCardsSortable(newCardContainer); // Re-apply sortable to include new card
        // });
    // });
});
