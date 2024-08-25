import { Component, EventEmitter, Output } from '@angular/core';
import { FormControl, Validators } from '@angular/forms';
import { CardService } from '../../shared/card.service';

@Component({
  selector: 'board-card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.css']
})
export class CardComponent {

  constructor(private cardService: CardService) { }

  @Output() cardUpdate = new EventEmitter<any>();

  cardTexts: string[] = [];
  newCardText: string = '';
  isAddingCard: boolean = false;

  cardListTitle = new FormControl('', Validators.required);

  toggleAddCard() {
    this.isAddingCard = true;
  }

  addCard() {
    if (this.newCardText.trim() && this.cardListTitle.value?.trim()) {
      const payload = {
        card_list_title: this.cardListTitle.value,
        card_text: this.cardTexts.push(this.newCardText)
      };
      this.isAddingCard = true;
      this.cardUpdate.emit(payload); // Emit the payload to the parent component


    }
  }

  // addCard() {
  //   if (this.newCardText.trim()) {
  //     this.cardTexts.push(this.newCardText.trim());
  //     this.newCardText = '';
  //     this.isAddingCard = false;
  //     // this.updateCard();
  //   }
  // }

  editCard(index: number) {
    console.log(index);
  }

  cancelAddCard() {
    this.newCardText = '';
    this.isAddingCard = false;
  }

}

