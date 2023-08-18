import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-file-import',
  templateUrl: './file-import.component.html',
  styleUrls: ['./file-import.component.css']
})
export class FileImportComponent implements OnInit {

  constructor(private http: HttpClient) {}

  ngOnInit(): void {
  }

  /*selectedFile: File | null = null;

  onFileSelected(event: any): void {
    this.selectedFile = event.target.files[0];
  }

  uploadFile(): void {
    if (this.selectedFile) {
      const formData = new FormData();
      formData.append('file', this.selectedFile);

      this.http.post('http://127.0.0.1:8000/upload-excel', formData).subscribe(
        (response) => {
          console.log('File uploaded successfully', response);
        },
        (error) => {
          console.error('Error uploading file', error);
        }
      );
    }
  }*/

  selectedFile: File | null = null;
  uploadedFileName: string | null = null;
  showWarning: boolean = false;

  onFileSelected(event: any): void {

    if (event.target.files[0] && this.isXlsxFile(event.target.files[0].name)) {
      this.selectedFile = event.target.files[0];
      this.uploadedFileName = event.target.files[0].name;
      this.showWarning = false;
    }else{
      this.selectedFile = null;
      this.uploadedFileName = null;
      this.showWarning = true;
    }
  }

  uploadFile(): void {
    if (this.selectedFile) {
      const formData = new FormData();
      formData.append('file', this.selectedFile);

      this.http.post('http://127.0.0.1:8000/upload-excel', formData).subscribe(
        (response: any) => {
          console.log('File uploaded successfully', response);
          this.uploadedFileName = response.filename; // Update the uploadedFileName
          // Redirect to another page
          // You can use Angular's router for navigation
        },
        (error) => {
          console.error('Error uploading file', error);
        }
      );
    }
  }

  isXlsxFile(fileName: string): boolean {
    return fileName.endsWith('.xlsx');
  }

}


