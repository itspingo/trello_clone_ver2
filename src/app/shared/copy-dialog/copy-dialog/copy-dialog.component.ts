import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-copy-dialog',
  templateUrl: './copy-dialog.component.html',
  styleUrls: ['./copy-dialog.component.css']
})
export class CopyDialogComponent {

  boards: any[] = ['Board 1', 'Board 2', 'Board 3'];
  lists: any[] = ['List 1', 'List 2', 'List 3'];
  positions: any[] = ['1', '2', '3'];

  boardName: string = '';


  constructor(
    public dialogRef: MatDialogRef<CopyDialogComponent>,
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
