import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SharedDialogComponent } from './shared-dialog.component';

describe('SharedDialogComponent', () => {
  let component: SharedDialogComponent;
  let fixture: ComponentFixture<SharedDialogComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [SharedDialogComponent]
    });
    fixture = TestBed.createComponent(SharedDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
