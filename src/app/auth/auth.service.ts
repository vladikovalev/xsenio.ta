import {Injectable} from '@angular/core';
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {Observable} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  constructor(private http: HttpClient) {
  }

  signInUser(email: string, password: string): Observable<any> {
    let headers = new HttpHeaders({
      'Content-Type': 'application/json'
    });
    let options = {
      headers: headers
    };

    let url = 'http://localhost:8080/login';
    let param = JSON.stringify({email: email, password: password});

    return this.http.post(url, param, options);
  }

  getAccessToken(): string {
    return JSON.parse(localStorage.getItem('xsenio')).accessToken;
  }

  isAuthenticated(): boolean {
    return localStorage.getItem('xsenio') !== null;
  }
}
