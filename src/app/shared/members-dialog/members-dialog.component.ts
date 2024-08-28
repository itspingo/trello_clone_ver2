import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';

@Component({
  selector: 'app-members-dialog',
  templateUrl: './members-dialog.component.html',
  styleUrls: ['./members-dialog.component.css']
})
export class MembersDialogComponent {


  constructor(
    public dialogRef: MatDialogRef<MembersDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) {}

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
