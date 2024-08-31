import { Component, Inject, OnInit } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialog, MatDialogRef } from '@angular/material/dialog';
import { ButtonState } from '../models/button-state.enum';
import { MembersDialogComponent } from '../members-dialog/members-dialog.component';
import { FormControl, FormGroup } from '@angular/forms';
import { LabelsDialogComponent } from '../labels-dialog/labels-dialog.component';
import { Label } from '../models/label.interface';
import { ListItemColorService } from '../list-item-color-service/list-item-color.service';
import { ActionState } from '../models/action-state.enum';
import { MoveDialogComponent } from '../move-dialog/move-dialog/move-dialog.component';
import { CopyDialogComponent } from '../copy-dialog/copy-dialog/copy-dialog.component';

@Component({
  selector: 'app-list-item-dialog',
  templateUrl: './list-item-dialog.component.html',
  styleUrls: ['./list-item-dialog.component.css']
})
export class ListItemDialogComponent implements OnInit {

  labels: Label[] = [];
  // selectedLabels: Label[] = [];

  descFormGroup: any;
  activityFormGroup: any;
  visibility: boolean = false;
  cardListTitle: string;
  cardListItemText: string;
  description: string;
  priorities = ['Highest', 'High', 'Medium', 'Low', 'Lowest'];
  statuses = ['To Do', 'In Progress', 'Done', 'In review', 'Approved', 'Not sure'];
  risks = ['Highest', 'High', 'Medium', 'Low', 'Lowest'];
  // addToCardButtons: string[] = ['Members', 'Labels', 'Checklist', 'Dates', 'attachment', 'Location', 'Cover', 'Custom Fields'];
  // actionButtons: string[] = ['Move', 'Copy', 'Make Template', 'Archive', 'Share']


  addToCardButtons: ButtonState[] = [
    ButtonState.MEMBERS,
    ButtonState.LABELS,
    ButtonState.CHECKLIST,
    ButtonState.DATES,
    ButtonState.ATTACHMENT,
    ButtonState.LOCATION,
    ButtonState.COVER,
    ButtonState.CUSTOM_FIELDS
  ];

  useActions: ActionState[] = [
    ActionState.MOVE,
    ActionState.COPY,
    ActionState.MAKE_TEMPLATE,
    ActionState.SHARE,
  ];

  constructor(
    private colorservice: ListItemColorService,
    public dialogRef: MatDialogRef<ListItemDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    private dialog: MatDialog
  ) {
    this.cardListItemText = data.title || 'Modal Title';
    this.cardListTitle = data.cardListTitle || '';
    this.description = data.description || '';
  }

  ngOnInit(): void {
    // this.labels = this.colorservice.getLabels();
    // console.log(this.labels);

    this.colorservice.labels$.subscribe(labels => {
      this.labels = labels;
      this.labels = this.colorservice.getLabels();

    });
    this.descFormGroup = new FormGroup({
      text: new FormControl()
    });

    this.activityFormGroup = new FormGroup({
      text: new FormControl()
    });
  }

  onCancel(): void {
    this.dialogRef.close();
  }

  onSave(): void {
    // Save logic here
    this.dialogRef.close({ description: this.description });
  }

  toggleVisibility() {
    this.visibility = !this.visibility;

  }

  onLabelsSelected(labels: Label[]): void {
    this.labels = labels;
  }

  onButtonClick(state: ButtonState): void {
    switch (state) {
      case ButtonState.MEMBERS:
        this.handleMembers();
        break;
      case ButtonState.LABELS:
        this.handleLabels();
        break;
      case ButtonState.CHECKLIST:
        this.handleChecklist();
        break;
      case ButtonState.DATES:
        this.handleDates();
        break;
      case ButtonState.ATTACHMENT:
        this.handleAttachment();
        break;
      case ButtonState.LOCATION:
        this.handleLocation();
        break;
      case ButtonState.COVER:
        this.handleCover();
        break;
      case ButtonState.CUSTOM_FIELDS:
        this.handleCustomFields();
        break;
    }
  }

  onActionClick(state: ActionState): void {
    switch (state) {
      case ActionState.MOVE:
        this.handleMove();
        break;
      case ActionState.COPY:
        this.handleCopy();
        break;
      case ActionState.MAKE_TEMPLATE:
        this.handleMakeTemplate();
        break;
      case ActionState.SHARE:
        this.handleShare();
        break;
    }
  }

  handleMembers() {
    console.log('Handle Members');
    const dialogRef = this.dialog.open(MembersDialogComponent, {
      width: '300px',
      data: {
        title: 'Members',
        fieldLabel: 'Members',
        placeholder: 'Search members',
        errorMessage: 'Please seach a member',
        fieldValue: ''
      }
    });

  }

  handleLabels() {
    console.log('Handle Labels');
    const dialogRef = this.dialog.open(LabelsDialogComponent, {
      width: '450px',
      data: {
        title: 'Labels',
        fieldLabel: 'Labels',
        placeholder: 'Search Labels',
        errorMessage: 'Please seach a Label',
        fieldValue: ''
      }
    });

    // dialogRef.afterClosed().subscribe((result: Label[]) => {
    //   if (result) {
    //     this.labels = result;
    //   }
    // });
  }

  handleChecklist() {
    console.log('Handle Checklist');
    // Implement the logic for handling Checklist
  }

  handleDates() {
    console.log('Handle Dates');
    // Implement the logic for handling Dates
  }

  handleAttachment() {
    console.log('Handle Attachment');
    // Implement the logic for handling Attachment
  }

  handleLocation() {
    console.log('Handle Location');
    // Implement the logic for handling Location
  }

  handleCover() {
    console.log('Handle Cover');
    // Implement the logic for handling Cover
  }

  handleCustomFields() {
    console.log('Handle Custom Fields');
    // Implement the logic for handling Custom Fields
  }

  // ACTIONS FUNCTIONS

  handleMove() {
    console.log('Handle Move');
    // Implement the logic for handling Move
    const dialogRef = this.dialog.open(MoveDialogComponent, {
      width: '400px',
      data: {
        title: 'Move Card',
        fieldLabel: 'Move',
        placeholder: 'Search Move',
        errorMessage: 'Please Move',
        fieldValue: '',
        selectedBoard: 'Board',
        selectedList: 'List',
        selectedPosition: 'Position'
      }
    });
  }

  handleCopy() {
    console.log('Handle Copy');
    const dialogRef = this.dialog.open(CopyDialogComponent, {
      width: '400px',
      data: {
        title: 'Copy Card',
        fieldLabel: 'Move',
        placeholder: 'Search Move',
        errorMessage: 'Please copy',
        fieldValue: '',
        selectedBoard: 'Board',
        selectedList: 'List',
        selectedPosition: 'Position'
      }
    });
  }

  handleMakeTemplate() {
    console.log('Handle Make Template');
    // Implement the logic for handling Make Template
  }

  handleShare() {
    console.log('Handle Share');
    // Implement the logic for handling Share
  }

}
