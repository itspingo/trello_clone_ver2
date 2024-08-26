import { Component } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { SharedDialogComponent } from '../shared-dialog/shared-dialog.component';
import { CardService } from '../card.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent {

  searchFieldText = "Jonathan";


  constructor(
    public dialog: MatDialog,
    private cardservice: CardService
  ) {

  }

  searchfield(event: any) {
    this.searchFieldText = event.target.value;

  }

  openDialog(): void {
    const dialogRef = this.dialog.open(SharedDialogComponent, {
      width: '400px',
      data: {
        title: 'Board title',
        fieldLabel: 'Board title *',
        placeholder: 'Enter board title',
        errorMessage: 'Board title is required',
        visibility: 'Workspace',
        visibilityOptions: ['Workspace', 'Public', 'Private'],
        fieldValue: ''
      }
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result) {
        console.log('Dialog result:', result);
        this.cardservice.changeTitle(result);
      }
    });
  }


}
