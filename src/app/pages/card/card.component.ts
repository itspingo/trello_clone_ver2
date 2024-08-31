import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { FormControl, Validators } from '@angular/forms';
import { CardService } from '../../shared/card-service/card.service';
import { Card } from 'src/app/shared/models/cards';
import { CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';
import { MatDialog } from '@angular/material/dialog';
import { ListItemDialogComponent } from 'src/app/shared/list-item-dialog/list-item-dialog.component';
import { ListItemColorService } from 'src/app/shared/list-item-color-service/list-item-color.service';
import { Label } from 'src/app/shared/models/label.interface';

@Component({
  selector: 'board-card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.css']
})
export class CardComponent implements OnInit {
  expandedElement: any;


  @Input() card!: Card;
  @Output() cardUpdate = new EventEmitter<Card>();
  @Output() titleUpdated = new EventEmitter<string>();

  cardTextsArray: string[] = [];
  newCardText: string = '';
  isAddingCard: boolean = false;
  labels: Label[] = [];


  cardListTitle = new FormControl('', Validators.required);

  constructor(
    private cardService: CardService,
    private listItemService: ListItemColorService,
    public dialog: MatDialog,
  ) { }

  ngOnInit(): void {
    if (this.card) {
      this.cardListTitle.setValue(this.card.card_list_title);
      this.cardTextsArray = this.card.card_text;
    }

    this.listItemService.labels$.subscribe(labels => {
      this.labels = labels;
    });
  }

  dropText(event: CdkDragDrop<string[]>) {
    moveItemInArray(this.cardTextsArray, event.previousIndex, event.currentIndex);
    console.log("Updated cardTextsArray: ", this.cardTextsArray);
  }

  toggleAddCard() {
    this.isAddingCard = true;
  }

  addCard() {

    if (this.newCardText.trim() && this.cardListTitle.value?.trim()) {
      this.cardTextsArray.push(this.newCardText);
      const payload = {
        card_list_title: this.cardListTitle.value,
        card_text: this.cardTextsArray
      };
      this.isAddingCard = true;
      this.cardUpdate.emit(payload); // Emit the payload to the parent component
      this.titleUpdated.emit(this.cardListTitle.value);

      this.newCardText = ''; // Clear the input after adding
      this.isAddingCard = false;


      this.cardService.getCards();


    }
  }

  updateTitle(newTitle: string) {
    this.cardListTitle.setValue(newTitle);
  }

  // updateTitle(newTitle: string) {
  //   this.cardListTitle.setValue(newTitle);
  //   this.titleUpdated.emit(newTitle); // Emit the updated title
  // }

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
    // const text = this.cardTextsArray[i];
    // this.openDialog(text);
  }

  // editCard(i: number): void {
  //   const text = this.cardTextsArray[i]; // Get the text based on the index
  //   this.openDialog(text);
  // }

  cancelAddCard() {
    this.newCardText = '';
    this.isAddingCard = false;
  }

  openDialog(title: string): void {
    const dialogRef = this.dialog.open(ListItemDialogComponent, {
      width: '60%',
      height: '100%',
      data: { title, cardListTitle: this.cardListTitle.value }
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log('The dialog was closed', result);
    });

  }

  getLabels(): Label[] {
    return this.listItemService.getLabels();
  }

  toggleLabel(label: Label): void {
    label.expanded = !label.expanded; // Toggle the expanded state
  }

}

