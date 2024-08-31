import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MoveDialogComponent } from './move-dialog.component';

describe('MoveDialogComponent', () => {
  let component: MoveDialogComponent;
  let fixture: ComponentFixture<MoveDialogComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [MoveDialogComponent]
    });
    fixture = TestBed.createComponent(MoveDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
