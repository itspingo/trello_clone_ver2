import { Component } from '@angular/core';

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent {

  isSidebarOpened = true;

  // Optional: You can also create a method to toggle the sidebar state
  toggleSidebar() {
    this.isSidebarOpened = !this.isSidebarOpened;
  }

}
