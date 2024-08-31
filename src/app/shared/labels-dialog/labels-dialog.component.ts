import { Component, EventEmitter, Inject, Output } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialog, MatDialogRef } from '@angular/material/dialog';
import { CreateLabelDialogComponent } from './create-label-dialog/create-label-dialog.component';
import { Label } from '../models/label.interface';
import { ListItemColorService } from '../list-item-color-service/list-item-color.service';
@Component({
  selector: 'app-labels-dialog',
  templateUrl: './labels-dialog.component.html',
  styleUrls: ['./labels-dialog.component.css']
})
export class LabelsDialogComponent {

  labels: Label[] = [];
  searchText: string = '';
  selectedLabels: Label[] = [];
searchQuery: any;


  constructor(
    private colorservice: ListItemColorService,
    public dialogRef: MatDialogRef<LabelsDialogComponent>,
    public dialog: MatDialog,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) {
    this.labels = this.colorservice.getLabels();
  }

  ngOnInit(): void {
    // Subscribe to the selected labels observable
    this.colorservice.labels$.subscribe(labels => {
      this.labels = labels;
    });

  }

  filteredLabels(): Label[] {
  const searchText = this.searchText?.toLowerCase() || '';  // Safely handle undefined or null searchText

  return this.labels.filter(label =>
    label.title?.toLowerCase().includes(searchText) // Safely handle undefined or null title
  );
}

  toggleLabel(label: Label): void {
    this.colorservice.toggleLabelSelection(label);
  }

  isChecked(label: Label): boolean {
    return this.colorservice.getLabels().some(l => l.title === label.title);
  }


  openCreateLabelDialog(): void {
    const dialogRef = this.dialog.open(CreateLabelDialogComponent, {
      width: '450px',
       data: {
        title: 'Create Label',
        fieldLabel: 'create label',
        placeholder: 'Create label',
        errorMessage: 'Please create a Label',
        fieldValue: ''
      }
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result) {
        this.labels.push(result);
        // this.colorservice.addLabel(result);
        this.labels = this.colorservice.getLabels();
      }
    });
  }

  onCancel(): void {
    this.dialogRef.close();
  }
}
