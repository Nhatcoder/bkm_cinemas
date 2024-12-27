export interface IUser {
  id: string;
  role_id: string;
  city_id?: null;
  cinema_id: string;
  facebook_id?: null;
  google_id?: null;
  name: string;
  first_name: string;
  last_name: string;
  image: string;
  image_url?: null;
  email: string;
  phone?: null;
  address?: null;
  date_birth?: null;
  gender?: null;
  email_verified_at?: null;
  status: string;
  type: string;
  is_terms_accepted: string;
  is_subscribed_promotions: string;
  created_at: string;
  updated_at: string;
}