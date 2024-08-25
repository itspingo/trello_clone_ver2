import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { DashboardRoutingModule } from './dashboard-routing.module';
import { DashboardComponent } from './dashboard.component';
import { MatIconModule } from '@angular/material/icon';
import { MatButtonModule } from '@angular/material/button';
import { MatMenuModule } from '@angular/material/menu';
import {MatProgressBarModule} from '@angular/material/progress-bar';
import {MatCardModule} from '@angular/material/card';
import {MatChipsModule} from '@angular/material/chips';
import {MatDividerModule} from '@angular/material/divider';
import {MatListModule} from '@angular/material/list';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { NavbarComponent } from 'src/app/shared/navbar/navbar.component';
import { CardComponent } from '../card/card.component';
import { FlexLayoutModule } from '@angular/flex-layout';
import { CardService } from 'src/app/shared/card.service';
import { HttpClientModule } from '@angular/common/http';
import { SubnavComponent } from 'src/app/shared/subnav/subnav.component';
import { SidebarComponent } from 'src/app/shared/sidebar/sidebar.component';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatExpansionModule } from '@angular/material/expansion';




@NgModule({
  declarations: [
    DashboardComponent,
    NavbarComponent,
    SubnavComponent,
    SidebarComponent,
    CardComponent,

  ],
  imports: [
    CommonModule,
    DashboardRoutingModule,
    MatButtonModule,
    MatIconModule,
    MatMenuModule,
    MatProgressBarModule,
    MatCardModule,
    MatChipsModule,
    MatDividerModule,
    MatListModule,
    MatFormFieldModule,
    MatInputModule,
    FormsModule,
    FlexLayoutModule,
    MatSidenavModule,
    MatIconModule,
    MatListModule,
    MatExpansionModule,
    ReactiveFormsModule,
    HttpClientModule
  ],

  providers: [
    CardService
  ]
})
export class DashboardModule { }
