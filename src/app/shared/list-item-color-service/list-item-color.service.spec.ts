import { TestBed } from '@angular/core/testing';

import { ListItemColorService } from './list-item-color.service';

describe('ListItemColorService', () => {
  let service: ListItemColorService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ListItemColorService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
