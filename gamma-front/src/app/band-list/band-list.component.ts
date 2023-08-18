import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-band-list',
  templateUrl: './band-list.component.html',
  styleUrls: ['./band-list.component.css']
})
export class BandListComponent implements OnInit {
  bands: any[] = [];

  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    this.loadBands();
  }

  loadBands(): void {
    this.http.get<any[]>('http://127.0.0.1:8000/bands/all').subscribe(
      (response) => {
        this.bands = response;
        console.log(this.bands);
      },
      (error) => {
        console.error('Error loading bands', error);
        if (error.status === 0) {
          console.error('Connection error. Make sure your backend server is running.');
        }
      }
    );
  }
  editBand(bandId: number) {
    // Implement your logic to handle the edit action, e.g., redirect to an edit page
    // You can use the bandId to identify the band being edited
  }
}
