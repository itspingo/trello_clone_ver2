import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-list-item-dialog',
  templateUrl: './list-item-dialog.component.html',
  styleUrls: ['./list-item-dialog.component.css']
})
export class ListItemDialogComponent {

  title: string;
  description: string;
  priorities = ['Low', 'Medium', 'High'];
  statuses = ['Open', 'In Progress', 'Closed'];
  risks = ['Low', 'Medium', 'High'];
  buttons: string[] = ['Members', 'Labels', 'Checklist', 'Dates', 'attachment', 'Location', 'Cover', 'Custom Fields'];


  constructor(
    public dialogRef: MatDialogRef<ListItemDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) {
    this.title = data.title || 'Modal Title';
    this.description = data.description || '';
   }

   onCancel(): void {
    this.dialogRef.close();
  }

  onSave(): void {
    // Save logic here
    this.dialogRef.close({ description: this.description });
  }

}
