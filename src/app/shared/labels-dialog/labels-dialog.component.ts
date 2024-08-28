import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialog, MatDialogRef } from '@angular/material/dialog';
import { CreateLabelDialogComponent } from './create-label-dialog/create-label-dialog.component';

interface Label {
  title: string;
  color: string;
}
@Component({
  selector: 'app-labels-dialog',
  templateUrl: './labels-dialog.component.html',
  styleUrls: ['./labels-dialog.component.css']
})
export class LabelsDialogComponent {

  labels: Label[] = [
    { title: 'Label 1', color: 'yellow' },
    { title: 'Label 2', color: 'red' },
    // Add more labels as needed
  ];

  selectedLabels: Label[] = [];
  searchText = '';

  constructor(
    public dialogRef: MatDialogRef<LabelsDialogComponent>,
    public dialog: MatDialog,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) {}

  filteredLabels(): Label[] {
    return this.labels.filter(label =>
      label.title.toLowerCase().includes(this.searchText.toLowerCase())
    );
  }

  toggleLabel(label: Label): void {
    const index = this.selectedLabels.indexOf(label);
    if (index >= 0) {
      this.selectedLabels.splice(index, 1);
    } else {
      this.selectedLabels.push(label);
    }
  }

  isChecked(label: Label): boolean {
    return this.selectedLabels.indexOf(label) >= 0;
  }

  openCreateLabelDialog(): void {
    const dialogRef = this.dialog.open(CreateLabelDialogComponent, {
      width: '300px',
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result) {
        this.labels.push(result);
      }
    });
  }
}
