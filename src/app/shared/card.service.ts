import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Cards } from './models/cards';

@Injectable({
  providedIn: 'root'
})
export class CardService {

  private apiUrl = 'http://localhost:8000/api/cards';

  constructor(private http: HttpClient) { }

  addCards(cardData: Cards): Observable<Cards> {
    return this.http.post<Cards>(`${this.apiUrl}`, cardData);
  }

  getCards(): Observable<Cards[]> {
    return this.http.get<Cards[]>(`${this.apiUrl}`);
  }
}

