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
import { CardService } from 'src/app/shared/card-service/card.service';
import { HttpClientModule } from '@angular/common/http';
import { SubnavComponent } from 'src/app/shared/subnav/subnav.component';
import { SidebarComponent } from 'src/app/shared/sidebar/sidebar.component';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatExpansionModule } from '@angular/material/expansion';
import { CdkDrag, CdkDropList, CdkDropListGroup, DragDropModule } from '@angular/cdk/drag-drop';
import { MatDialogModule } from '@angular/material/dialog';
import { BoardDialogComponent } from 'src/app/shared/board-dialog/board-dialog.component';
import { MatSelectModule } from '@angular/material/select'
import { ListItemDialogComponent } from 'src/app/shared/list-item-dialog/list-item-dialog.component';
import {MatCheckboxModule} from '@angular/material/checkbox';
import { MembersDialogComponent } from 'src/app/shared/members-dialog/members-dialog.component';
import { EditorModule } from 'primeng/editor';
import { DropdownModule } from 'primeng/dropdown';
import { LabelsDialogComponent } from 'src/app/shared/labels-dialog/labels-dialog.component';
import { CreateLabelDialogComponent } from 'src/app/shared/labels-dialog/create-label-dialog/create-label-dialog.component';
import { ColorPickerModule } from 'primeng/colorpicker';
import { ListItemColorService } from 'src/app/shared/list-item-color-service/list-item-color.service';
import { ButtonModule } from 'primeng/button';
import { MoveDialogComponent } from 'src/app/shared/move-dialog/move-dialog/move-dialog.component';
import { CopyDialogComponent } from 'src/app/shared/copy-dialog/copy-dialog/copy-dialog.component';









@NgModule({
  declarations: [
    DashboardComponent,
    NavbarComponent,
    SubnavComponent,
    SidebarComponent,
    CardComponent,
    BoardDialogComponent,
    ListItemDialogComponent,
    MembersDialogComponent,
    LabelsDialogComponent,
    CreateLabelDialogComponent,
    MoveDialogComponent,
    CopyDialogComponent
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
    HttpClientModule,
    DragDropModule,
    CdkDropListGroup,
    CdkDropList,
    CdkDrag,
    MatDialogModule,
    MatSelectModule,
    MatCheckboxModule,
    EditorModule,
    DropdownModule,
    ColorPickerModule,
    ButtonModule

  ],

  providers: [
    CardService,
    ListItemColorService
  ]
})
export class DashboardModule { }
