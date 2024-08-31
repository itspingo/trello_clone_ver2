import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-move-dialog',
  templateUrl: './move-dialog.component.html',
  styleUrls: ['./move-dialog.component.css']
})
export class MoveDialogComponent {
  boards: any[] = ['Board 1', 'Board 2', 'Board 3'];
  lists: any[] = ['List 1', 'List 2', 'List 3'];
  positions: any[] = ['1', '2', '3'];


  constructor(
    public dialogRef: MatDialogRef<MoveDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) { }


  memberSearchText: string = '';


  searchMembers(event: any) {
    this.memberSearchText = event.target.value;

  }
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
