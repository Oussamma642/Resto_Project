

select
    u.user_id, r.reservation_id, u.first_name, u.last_name, r.reservation_date, r.time_slot, r.nbrGuests, r.status 
from user u 
inner join reservations r on u.user_id = r.user_id;
