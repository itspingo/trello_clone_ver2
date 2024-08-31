import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { Label } from '../models/label.interface';

@Injectable({
  providedIn: 'root'
})
export class ListItemColorService {

  private labelsSubject = new BehaviorSubject<Label[]>([]);
  labels$ = this.labelsSubject.asObservable();

  private colorSubject = new BehaviorSubject<string>('');
  color$ = this.colorSubject.asObservable();

  private backgroundImageSource = new BehaviorSubject<string>('');
  currentBackgroundImage = this.backgroundImageSource.asObservable();


  setColor(colorClass: string): void {
    this.colorSubject.next(colorClass);
  }

  getColor(): string {
    return this.colorSubject.getValue();
  }

  changeBackgroundImage(imageUrl: string): void {
    this.backgroundImageSource.next(imageUrl);
  }

  // private selectedLabelsSubject = new BehaviorSubject<Label[]>([]);
  // selectedLabels$ = this.selectedLabelsSubject.asObservable();

  constructor() {
    // Initialize with default labels if needed
    this.labelsSubject.next([
      { id: 1, title: 'Label 1', color: 'yellow' },
      { id: 2, title: 'Label 2', color: 'red' }
    ]);
  }

  getLabels(): Label[] {
    return this.labelsSubject.value;
  }

  addLabel(label: Label): void {
    const currentLabels = this.labelsSubject.value;
    this.labelsSubject.next([...currentLabels, label]);
  }

   toggleLabelSelection(label: Label): void {
    const currentSelectedLabels = this.labelsSubject.value;
    const index = currentSelectedLabels.findIndex(l => l.id === label.id);


    if (index >= 0) {
      // Remove if already selected
      currentSelectedLabels.splice(index, 1);
    } else {
      // Add if not selected
      currentSelectedLabels.push(label);
    }
    this.labelsSubject.next(currentSelectedLabels);
  }
}
