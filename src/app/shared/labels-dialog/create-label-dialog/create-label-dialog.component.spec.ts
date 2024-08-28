import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateLabelDialogComponent } from './create-label-dialog.component';

describe('CreateLabelDialogComponent', () => {
  let component: CreateLabelDialogComponent;
  let fixture: ComponentFixture<CreateLabelDialogComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [CreateLabelDialogComponent]
    });
    fixture = TestBed.createComponent(CreateLabelDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
