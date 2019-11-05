import {Component, OnInit} from '@angular/core';
import {CounterService} from "./counter.service";
import {MatDialog} from '@angular/material/dialog';
import {PopupComponent} from "./popup/popup.component";
import {AuthService} from "../auth/auth.service";

@Component({
  selector: 'app-counter',
  templateUrl: './counter.component.html',
  styleUrls: ['./counter.component.scss'],
})
export class CounterComponent implements OnInit {
  counter: number;

  constructor(private counterService: CounterService,
              private dialog: MatDialog,
              private authService: AuthService) {
    this.counter = 0;
  }

  ngOnInit() {
  }

  increment() {
    return this.counterService.increment(this.counter).subscribe(
      (data: number) => {
        this.counter = data;
      });
  }

  incrementClickEventHandler() {
    this.counterService.increment(this.counter).subscribe(
      (data: number) => {
        const dialogRef = this.dialog.open(PopupComponent, {
          data: {
            counter: data
          }
        });

        dialogRef.afterClosed().subscribe(result => {
          if (result) this.counter = data;
        });
      });
  }
}
