import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LabelsDialogComponent } from './labels-dialog.component';

describe('LabelsDialogComponent', () => {
  let component: LabelsDialogComponent;
  let fixture: ComponentFixture<LabelsDialogComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [LabelsDialogComponent]
    });
    fixture = TestBed.createComponent(LabelsDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
