import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { Card } from './models/cards';

@Injectable({
  providedIn: 'root'
})
export class CardService {

  private apiUrl = 'http://localhost:8000/api/cards';
  private titleSource = new BehaviorSubject<string>('');
  currentTitle = this.titleSource.asObservable();

  constructor(private http: HttpClient) { }

  getCards(): Observable<Card[]> {
    return this.http.get<Card[]>(`${this.apiUrl}`);
  }

  addCards(cardData: Card): Observable<Card> {
    return this.http.post<Card>(`${this.apiUrl}`, cardData);
  }

  updateCard(cardId: number, updatedCard: Card): Observable<Card> {
    return this.http.put<Card>(`${this.apiUrl}/cards/${cardId}`, updatedCard);
  }

  changeTitle(title: string) {
    this.titleSource.next(title);
  }

}

