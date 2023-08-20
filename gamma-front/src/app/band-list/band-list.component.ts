import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { BandService } from '../band-service.service';
import * as XLSX from 'xlsx';

@Component({
  selector: 'app-band-list',
  templateUrl: './band-list.component.html',
  styleUrls: ['./band-list.component.css'],
})
export class BandListComponent implements OnInit {
  bands: any[] = [];

  constructor(
    private http: HttpClient,
    private router: Router,
    private bandService: BandService
  ) {}

  ngOnInit(): void {
    this.loadBands();
  }

  exportToSpreadsheet() {
    const worksheet: XLSX.WorkSheet = XLSX.utils.json_to_sheet(this.bands);
    const workbook: XLSX.WorkBook = {
      Sheets: { data: worksheet },
      SheetNames: ['data'],
    };
    const excelBuffer: any = XLSX.write(workbook, {
      bookType: 'xlsx',
      type: 'array',
    });
    const data: Blob = new Blob([excelBuffer], {
      type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    });
    const fileName: string = 'The new bands.xlsx';

    // Trigger download
    const a = document.createElement('a');
    a.href = URL.createObjectURL(data);
    a.download = fileName;
    a.click();
  }
  loadBands(): void {
    this.http.get<any[]>('http://127.0.0.1:8000/bands/all').subscribe(
      (response) => {
        this.bands = response;
        console.log(this.bands);
        //console.log(this.bands);
      },
      (error) => {
        console.error('Error loading bands', error);
        if (error.status === 0) {
          console.error(
            'Connection error. Make sure your backend server is running.'
          );
        }
      }
    );
  }
  editBand(bandId: number) {
    this.router.navigate(['/bandsEdit', bandId]);
  }
  deleteBand(id: number): void {
    if (confirm('Voulez-vous vraiment supprimer ce groupe ?')) {
      this.bandService.deleteBand(id).subscribe(() => {
        this.bands = this.bands.filter((band) => band.id !== id);
      });
    }
  }
  navigateToUpload() {
    this.router.navigate(['/']);
  }
}
