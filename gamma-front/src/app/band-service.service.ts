import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Band } from 'src/models/band.model';

@Injectable({
  providedIn: 'root',
})
export class BandService {
  private apiUrl = 'http://127.0.0.1:8000';
  constructor(private http: HttpClient) {}

  getBands(): Observable<any> {
    return this.http.get('/api/bands');
  }

  updateBand(newBand: any, id: number): Observable<any> {
    return this.http.post(`${this.apiUrl}/bands/update/${id}`, newBand);
  }

  getBandById(id: number): Observable<Band> {
    return this.http.get<Band>(`${this.apiUrl}/bands/getOne/${id}`);
  }

  deleteBand(id: number): Observable<void> {
    return this.http.delete<void>(`${this.apiUrl}/bands/delete/${id}`);
  }
}
