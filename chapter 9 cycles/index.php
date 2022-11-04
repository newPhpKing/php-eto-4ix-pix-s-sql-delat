<?php
/*
 1. Числа Фибоначчи - это последовательность вида , 1, 1, 2, 3, 5, ". каждое число
является суммой двух предыдущих чисел. Создайте скрипт, который бы вычислял любое наперед заданное число Фибоначчи, скажем, число с порядковым
номером 200.
2. Создайте скриm, который выводил бы календарь на текущий месяц в виде
таблицы. Столбцы таблицы должны представлять дни недели от понедельника
до воскресенья, а в ячейках таблицы выводиться числа месяца.
 */
//task 1
class Calendar {

    public static function getMonth($month, $year, $events = array()) {
        $months = array(
            1 => 'Январь',
            2 => 'Февраль',
            3 => 'Март',
            4 => 'Апрель',
            5 => 'Май',
            6 => 'Июнь',
            7 => 'Июль',
            8 => 'Август',
            9 => 'Сентябрь',
            10 => 'Октябрь',
            11 => 'Ноябрь',
            12 => 'Декабрь'
        );

        $month = intval($month);
        $out = '
		<div class="calendar-item">
			<div class="calendar-head">' . $months[$month] . ' ' . $year . '</div>
			<table>
				<tr>
					<th>Пн</th>
					<th>Вт</th>
					<th>Ср</th>
					<th>Чт</th>
					<th>Пт</th>
					<th>Сб</th>
					<th>Вс</th>
				</tr>';

        $day_week = date('N', mktime(0, 0, 0, $month, 1, $year));
        $day_week--;

        $out .= '<tr>';

        for ($x = 0; $x < $day_week; $x++) {
            $out .= '<td></td>';
        }

        $days_counter = 0;
        $days_month = date('t', mktime(0, 0, 0, $month, 1, $year));

        for ($day = 1; $day <= $days_month; $day++) {
            if (date('j.n.Y') == $day . '.' . $month . '.' . $year) {
                $class = 'today';
            } elseif (time() > strtotime($day . '.' . $month . '.' . $year)) {
                $class = 'last';
            } else {
                $class = '';
            }

            $event_show = false;
            $event_text = array();
            if (!empty($events)) {
                foreach ($events as $date => $text) {
                    $date = explode('.', $date);
                    if (count($date) == 3) {
                        $y = explode(' ', $date[2]);
                        if (count($y) == 2) {
                            $date[2] = $y[0];
                        }

                        if ($day == intval($date[0]) && $month == intval($date[1]) && $year == $date[2]) {
                            $event_show = true;
                            $event_text[] = $text;
                        }
                    } elseif (count($date) == 2) {
                        if ($day == intval($date[0]) && $month == intval($date[1])) {
                            $event_show = true;
                            $event_text[] = $text;
                        }
                    } elseif ($day == intval($date[0])) {
                        $event_show = true;
                        $event_text[] = $text;
                    }
                }
            }

            if ($event_show) {
                $out .= '<td class="calendar-day ' . $class . ' event">' . $day;
                if (!empty($event_text)) {
                    $out .= '<div class="calendar-popup">' . implode('<br>', $event_text) . '</div>';
                }
                $out .= '</td>';
            } else {
                $out .= '<td class="calendar-day ' . $class . '">' . $day . '</td>';
            }

            if ($day_week == 6) {
                $out .= '</tr>';
                if (($days_counter + 1) != $days_month) {
                    $out .= '<tr>';
                }
                $day_week = -1;
            }

            $day_week++;
            $days_counter++;
        }

        $out .= '</tr></table></div>';
        return $out;
    }
}
echo Calendar::getMonth(date('n'), date('Y'));
//task 2
function Fibonacci($n) {
    $i = 0;
    $a = 0;
    $b = 1;
    for ($i; $i < $n; $i++)
        $b = $a + ($a = $b);
    return $a;
    }

echo "Фибоначи:" . Fibonacci(4);


