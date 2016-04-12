# Repetitive Date Estimator

Small project to help estimating events that occurs every month on specific timeframe.

So 2 weeks interval means that it should be estimated for every 15-th and 29-th day of the month
Every 1 week interval means that it should be estimated for every 8-th 15-th 22-th and 29-th of the month.

Of course it is a numeric parameter so it can be even every 5 days.

The goal is to have the even occurs on exactly the same days for each month.


# Example usage:

```
$estimator = RepetitiveDateEstimator::build(new DateTime(), RepeatitiveInterval::twoWeeks());
```

if today is 01.01.2016 then it would produce:

```
$estimator->getNextDate(); // new DateTime('15.01.2016');
$estimator->getNextDate(); // new DateTime('29.01.2016');
$estimator->getNextDate(); // new DateTime('15.02.2016');
$estimator->getNextDate(); // new DateTime('29.02.2016');
```

if you want to use other intervals you can pass arbitrary number to RepetitiveInterval ValueObject

```
RepetitiveInterval::oneWeek(); // every 7 days starting from the first day of month
RepetitiveInterval::fromNumber(10); // every 10 days starting from the first day of month
```