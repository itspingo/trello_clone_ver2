import { Component } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-create-label-dialog',
  templateUrl: './create-label-dialog.component.html',
  styleUrls: ['./create-label-dialog.component.css']
})
export class CreateLabelDialogComponent {

  labelTitle = '';
  selectedColor = '#000000';

  constructor(public dialogRef: MatDialogRef<CreateLabelDialogComponent>) {}

  createLabel() {
    const newLabel = { title: this.labelTitle, color: this.selectedColor };
    this.dialogRef.close(newLabel);
  }
}
