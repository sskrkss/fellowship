SELECT COUNT(*) AS "Количество сотрудников" FROM developer;
SELECT COUNT(*) AS "Количество проектов" FROM project;
SELECT COUNT(CASE WHEN position = 'программист' THEN 1 END) AS "Количество программистов" FROM developer;
SELECT COUNT(CASE WHEN position = 'администратор' THEN 1 END) AS "Количество администраторов" FROM developer;
SELECT COUNT(CASE WHEN position = 'devops' THEN 1 END) AS "Количество devops" FROM developer;
SELECT COUNT(CASE WHEN position = 'дизайнер' THEN 1 END) AS "Количество дизайнеров" FROM developer;
SELECT MAX(salary) AS "Максимальная зарплата" FROM developer;
SELECT MIN(salary) AS "Минимальная зарплата" FROM developer;
SELECT ROUND(AVG(salary))::INTEGER AS "Средняя зарплата" FROM developer;