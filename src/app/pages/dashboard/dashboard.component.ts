import { CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';
import { Component, ChangeDetectionStrategy, OnInit, OnChanges, SimpleChanges } from '@angular/core';
import { CardService } from 'src/app/shared/card.service';
import { Card } from 'src/app/shared/models/cards';
@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
  // changeDetection: ChangeDetectionStrategy.OnPush,
})
export class DashboardComponent implements OnInit {

  isAddingCard: boolean = false;
  cards: Card[] = [];

  constructor(private cardservice: CardService) {}

  ngOnInit(): void {
    this.loadCards();
  }

  drop(event: CdkDragDrop<Card[]>) {
    console.log("Previous Index:", event.previousIndex);
    console.log("Current Index:", event.currentIndex);
    moveItemInArray(this.cards, event.previousIndex, event.currentIndex);
    console.log("Cards after rearrangement:", this.cards);
  }


  loadCards(): void {
    this.cardservice.getCards().subscribe((cards) => {
      this.cards = cards;
      console.log("Loaded Cards-->", this.cards);
    });
  }

  pushCard() {
    const newCard = { card_list_title: '', card_text: [] };
    this.cards.push(newCard);
    console.log("Pushed Cards-->", this.cards);
  }

  onCardUpdate(index: number, updatedData: Card) {
    const payload = {
      card_list_title: updatedData.card_list_title,
      card_text: updatedData.card_text,
    };

    this.cardservice.addCards(payload).subscribe(card => {
      this.cards[index] = card; // Update the card with the saved card data
      console.log("cards index and updated data----->", index, card);
    });
  }

}
