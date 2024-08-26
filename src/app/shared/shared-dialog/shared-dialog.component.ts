import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-shared-dialog',
  templateUrl: './shared-dialog.component.html',
  styleUrls: ['./shared-dialog.component.css']
})
export class SharedDialogComponent {

  constructor(
    public dialogRef: MatDialogRef<SharedDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) {}

  isFieldInvalid(): boolean {
    return !this.data.fieldValue || this.data.fieldValue.trim() === '';
  }

  onCancel(): void {
    this.dialogRef.close();
  }

  onSubmit(): void {
    this.dialogRef.close(this.data.fieldValue);
  }

  onTemplate(): void {
    // Logic for handling "Start with a template"
  }

}
