// supabase.js - Client initialization
import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

const SUPABASE_URL = 'https://dexhdxmgenpakfjazvte.supabase.co';
const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImRleGhkeG1nZW5wYWtmamF6dnRlIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU1NzE0MDQsImV4cCI6MjA2MTE0NzQwNH0.1rX6_Z-ft5rd3DlaOoDlek-w7PHxumFgxvPQ9YjMzJY';

// Initialize the Supabase client
export const supabase = createClient(SUPABASE_URL, SUPABASE_ANON_KEY);