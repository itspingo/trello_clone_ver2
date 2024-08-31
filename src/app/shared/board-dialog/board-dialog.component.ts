import { Component, EventEmitter, Inject, Output } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { ListItemColorService } from '../list-item-color-service/list-item-color.service';

@Component({
  selector: 'app-board-dialog',
  templateUrl: './board-dialog.component.html',
  styleUrls: ['./board-dialog.component.css']
})
export class BoardDialogComponent {

  selectedColorClass: string | any;
  selectedImageUrl: string = '';

  imageWidth: number = 64;
  imageHeight: number = 40;

  colors = [
    { name: 'colorA', class: 'rgb-1' },
    { name: 'colorB', class: 'rgb-2' },
    { name: 'colorC', class: 'rgb-3' },
    { name: 'colorD', class: 'rgb-4' },
    { name: 'colorE', class: 'rgb-5' },
    // Add more colors as needed
  ];

  images = [
    { url: 'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0', alt: 'Mountains', class: 'image-mountains' },
    { url: 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e', alt: 'Forest', class: 'image-forest' },
    { url: 'https://images.unsplash.com/photo-1508672019048-805c876b67e2', alt: 'River', class: 'image-river' },
    { url: 'https://images.unsplash.com/photo-1495567720989-cebdbdd97913', alt: 'Lake', class: 'image-lake' },
    // { url: 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29', alt: 'Desert', class: 'image-desert' },
    // { url: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e', alt: 'Beach', class: 'image-beach' }
  ];


  constructor(
    private colorservice: ListItemColorService,
    public dialogRef: MatDialogRef<BoardDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) {}

  selectColor(color: { name: string, class: string }): void {
    this.selectedColorClass = color.class;
  }

  selectImage(image: { url: string, alt: string, class: string }): void {
    this.selectedImageUrl = image.url;
    this.colorservice.changeBackgroundImage(image.url);
    console.log('Selected image URL:', this.selectedImageUrl);
    // Additional logic can be added here, e.g., emitting the selected image URL to a parent component
  }

  isFieldInvalid(): boolean {
    return !this.data.fieldValue || this.data.fieldValue.trim() === '';
  }

  onCancel(): void {
    this.dialogRef.close();
  }

  onSubmit(): void {
    console.log('Selected color class:', this.selectedColorClass);
    this.colorservice.setColor(this.selectedColorClass);
    this.dialogRef.close(this.data.fieldValue);
  }

  onTemplate(): void {
    // Logic for handling "Start with a template"
  }

}
