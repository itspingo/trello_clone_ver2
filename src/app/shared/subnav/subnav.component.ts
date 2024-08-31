import { Component, OnInit } from '@angular/core';
import { CardService } from '../card-service/card.service';

@Component({
  selector: 'app-subnav',
  templateUrl: './subnav.component.html',
  styleUrls: ['./subnav.component.css']
})
export class SubnavComponent implements OnInit {

  title: string = '';

  constructor(private cardservice: CardService) { }

  ngOnInit(): void {
    this.cardservice.currentTitle.subscribe(title => this.title = title);
  }

}
