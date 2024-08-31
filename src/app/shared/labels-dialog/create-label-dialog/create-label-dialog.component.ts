import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-create-label-dialog',
  templateUrl: './create-label-dialog.component.html',
  styleUrls: ['./create-label-dialog.component.css']
})
export class CreateLabelDialogComponent {

  labelTitle = '';
  selectColor: string | undefined;

  constructor(public dialogRef: MatDialogRef<CreateLabelDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any

  ) {}

  createLabel() {
    const newLabel = { title: this.labelTitle, color: this.selectColor };
    this.dialogRef.close(newLabel);
  }

  showColorText(event: any) {
    this.labelTitle = event.target.value;
  }

  onCancel(): void {
    this.dialogRef.close();
  }

}
