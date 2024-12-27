export interface IUser {
  Id: string;
  Name: string;
  ImageUrl: string;
  Phone?: string;
  Email?: string;
  Email_verified_at: string;
  JwtToken: string;
  RefreshToken: string;
  Role: 'admin' | 'staff' | 'customer';
  CreatedAt: Date;
  UpdatedAt: Date;
}
