import { Component } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { BoardDialogComponent } from '../board-dialog/board-dialog.component';
import { CardService } from '../card-service/card.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent {

 selectedColorClass: string = '';
  searchFieldText = "Jonathan";


  constructor(
    public dialog: MatDialog,
    private cardservice: CardService
  ) {

  }

  searchfield(event: any) {
    this.searchFieldText = event.target.value;

  }

  // updateDashboardBackground(colorClass: string): void {
  //   const dashboardElement = document.querySelector('.dashboard-body');
  //   if (dashboardElement) {
  //     dashboardElement.className = `dashboard-body ${colorClass}`;
  //   }
  // }


  openDialog(): void {
    const dialogRef = this.dialog.open(BoardDialogComponent, {
      width: '330px',
      data: {
        title: 'Create Board',
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
